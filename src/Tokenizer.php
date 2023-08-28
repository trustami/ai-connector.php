<?php
namespace Trustami\TrustamiAi;

class Tokenizer extends Connector
{
    public function __construct(string $token)
    {
        $this->init($token);
    }

    /**
     * Summarize a text
     *
     * @param string $text
     * @param bool $advanced
     * @param bool $splitCamelCase
     * @return array
     */
    public function tokenize(string $text, bool $advanced = true, bool $splitCamelCase = true): array
    {
        $data = $this->makeRequest("/tokn", [
            "text"             => $text,
            "advanced"         => $advanced,
            "split_camel_case" => $splitCamelCase,
        ]);

        $sentences = $data["sentences"] ?? false;

        if (!$sentences) {
            throw new \Exception("Failed to tokenize text");
        }

        return $sentences;
    }
}
