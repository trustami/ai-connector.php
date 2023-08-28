<?php
namespace Trustami\TrustamiAi;

class Summarizer extends Connector
{
    public function __construct(string $token)
    {
        $this->init($token);
    }

    /**
     * Summarize a text
     *
     * @param string $text
     * @param int $sentenceCount
     * @return string
     */
    public function summarize(string $text, int $sentenceCount = 3): string
    {
        $data = $this->makeRequest("/summ", [
            "text"           => $text,
            "sentence_count" => $sentenceCount,
        ]);

        $summary = $data["summary"] ?? false;

        if (!$summary) {
            throw new \Exception("Failed to summarize text");
        }

        return $summary;
    }
}
