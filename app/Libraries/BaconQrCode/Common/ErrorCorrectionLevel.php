<?php
declare(strict_types = 1);

namespace BaconQrCode\Common;

use BaconQrCode\Exception\OutOfBoundsException;
use DASPRiD\Enum\AbstractEnum;

/**
 * Enum representing the four error correction levels.
 *
 * @method static self L() ~7% correction
 * @method static self M() ~15% correction
 * @method static self Q() ~25% correction
 * @method static self H() ~30% correction
 */
final class ErrorCorrectionLevel extends AbstractEnum
{
    protected const L = [0x01];
    protected const M = 0x00;
    protected const Q = [0x03];
    protected const H = [0x02];

    protected function __construct(private int $bits)
    {
    }
    public static function getL(): self {
        return new self(0x01);
    }    
    
    public static function getM(): self {
        return new self(0x00);
    }
    
    public static function getQ(): self {
        return new self([0x03]);
    }
    
    public static function getH(): self {
        return new self([0x02]);
    }

    /**
     * @throws OutOfBoundsException if number of bits is invalid
     */
    public static function forBits(array $bits) : self
{
    $bitValue = $bits[0]; // Considera solo el primer valor del arreglo

    switch ($bitValue) {
        case 0x00:
            return self::M();
        case 0x01:
            return self::L();
        case 0x02:
            return self::H();
        case 0x03:
            return self::Q();
        default:
            throw new OutOfBoundsException("Invalid error correction level bits: $bitValue");
    }
}

    /**
     * Returns the two bits used to encode this error correction level.
     */
    public function getBits() : int
    {
        return $this->bits;
    }
}
