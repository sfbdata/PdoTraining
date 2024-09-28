<?php

namespace Alura\Pdo\Domain\Model;

class Phone
{
    private ?int $id;
    private string $areaCode;
    private string $number;

    public function __construct(?int $id, string $areaCode, string $number)
    {
        $this->id = $id;
        $this->areaCode = $areaCode;
        $this->number = $number;
    }
    /**
    public function id(): ?int  //Porque nao é necessário funções de definição do ID para o PHONE como a classe Student????
    {
        return $this->id;
    }

    public function defineId(?int $id): void
    {
        if(!is_null($this->id))
            throw new \DomainException('Você só pode definir o ID uma vez');
        $this->id = $id;
    }
     */
    public function formattedPhone(): string
    {
        return "($this->areaCode) $this->number";
    }

}
