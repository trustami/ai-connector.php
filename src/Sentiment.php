<?php
namespace Trustami\TrustamiAi;

class Sentiment extends Connector
{
    public function __construct(string $token)
    {
        $this->init($token);
    }

    /**
     * Get sentiment of a text
     *
     * @param string $text
     * @return array
     */
    public function analyze(string $text): array
    {
        $data = $this->makeRequest("/sent", [
            "text" => $text,
        ]);

        $polarity = $data["polarity"] ?? false;
        $score    = $data["score"] ?? false;

        if (!$polarity || is_numeric($score)) {
            throw new \Exception("Failed to analyze sentiment");
        }

        return [
            "polarity" => $polarity,
            "score"    => $score,
        ];
    }
}
