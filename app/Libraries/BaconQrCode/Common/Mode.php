<?php
declare(strict_types = 1);

namespace BaconQrCode\Common;

use DASPRiD\Enum\AbstractEnum;

/**
 * Enum representing various modes in which data can be encoded to bits.
 *
 * @method static self TERMINATOR()
 * @method static self NUMERIC()
 * @method static self ALPHANUMERIC()
 * @method static self STRUCTURED_APPEND()
 * @method static self BYTE()
 * @method static self ECI()
 * @method static self KANJI()
 * @method static self FNC1_FIRST_POSITION()
 * @method static self FNC1_SECOND_POSITION()
 * @method static self HANZI()
 */
final class Mode extends AbstractEnum
{
    public const TERMINATOR = [[0, 0, 0, 0, 0, 0], 0x00];
    public const NUMERIC = 1;
    public const ALPHANUMERIC = [[9, 11, 13], 0x02]; // Debe ser público
    public const STRUCTURED_APPEND = [[0, 0, 0], 0x03];
    public const BYTE = [[8, 16, 16], 0x04];
    public const ECI = [[0, 0, 0], 0x07];
    public const KANJI = [[8, 10, 12], 0x08];
    public const FNC1_FIRST_POSITION = [[0, 0, 0], 0x05];
    public const FNC1_SECOND_POSITION = [[0, 0, 0], 0x09];
    public const HANZI = [[8, 10, 12], 0x0d];
    

    /**
     * @param int[] $characterCountBitsForVersions
     */
    protected function __construct(
        public array $characterCountBitsForVersions,
        public int   $bits
    ) {
    }
    public static function create(int $modeType): self
{
    switch ($modeType) {
        case self::NUMERIC:
            return new self([10, 12, 14], 0x01);
        case self::ALPHANUMERIC:
            return new self([9, 11, 13], 0x02);
        // Agregar otros casos según sea necesario
        default:
            throw new \InvalidArgumentException('Invalid mode type');
    }
}

    /**
     * Returns the number of bits used in a specific QR code version.
     */
    
     public function getCharacterCountBits(Version $version) : int
    {
        $number = $version->getVersionNumber();

        if ($number <= 9) {
            $offset = 0;
        } elseif ($number <= 26) {
            $offset = 1;
        } else {
            $offset = 2;
        }

        return $this->characterCountBitsForVersions[$offset];
    }

    /**
     * Returns the four bits used to encode this mode.
     */
    
     public function getBits() : int
    {
        return $this->bits;
    }
}
