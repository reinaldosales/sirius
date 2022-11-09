<?php

enum CardBrand: int
{
    case Cielo = 0;
    case Mastercard = 1;
    case Visa = 2;
    case Hipercard = 3;

    public function description(): string
    {
        return match ($this) {
            CardBrand::Cielo => 'Cielo',
            CardBrand::Mastercard => 'Mastercard',
            CardBrand::Visa => 'Visa',
            CardBrand::Hipercard => 'Hipercard',
        };
    }
}

enum CardType: int
{
    case Credit = 0;
    case Debit = 1;

    public function description(): string
    {
        return match ($this) {
            CardType::Credit => 'Crédito',
            CardType::Debit => 'Débito',
        };
    }

    public function value()
    {
        return match ($this) {
            CardType::Credit => 0,
            CardType::Debit => 1,
        };
    }
}
