<?php declare(strict_types=1);

namespace Phpmvc\Core\Logger\Formatters;

abstract class AbstractFormatter
{
    private string $formatTemplate = "";

    public function __invoke(array $record)
    {
        $formattedRecord = $this->formatTemplate;
        $formattedRecord = strtr($formattedRecord, ["{datetime}" => $record['datetime']->format(\DateTimeImmutable::W3C)]);
        $formattedRecord = strtr($formattedRecord, ["{level}"    => $record['level']]);
        $formattedRecord = strtr($formattedRecord, ["{message}"  => $record['message']]);
        
        foreach ($record['context'] as $key => $value) {
            $formattedRecord = strtr($formattedRecord, ['{'.$key.'}' => $value]);
        }


        return $formattedRecord;
    }   


    /**
     * Set the value of formatTemplate
     *
     * @param string $formatTemplate
     *
     * @return self
     */
    protected function setFormatTemplate(string $formatTemplate): self
    {
        $this->formatTemplate = $formatTemplate;

        return $this;
    }
}