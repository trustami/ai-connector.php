<?php
namespace Trustami\TrustamiAi;

class NERTagger extends Connector
{
    public function __construct(string $token)
    {
        $this->init($token);
    }

    /**
     * Summarize a text
     *
     * @param string $text
     * @param string $language
     * @return array
     */
    public function recognizeEntities(string $text, string $language = "german"): array
    {
        $data = $this->makeRequest("/nert", [
            "text"     => $text,
            "language" => $language,
        ]);

        $entities = $data["recognized_named_entites"] ?? false;

        if (!$entities) {
            throw new \Exception("Failed to recognize named entities");
        }

        return $entities;
    }
}
