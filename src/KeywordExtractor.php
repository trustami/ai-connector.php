<?php
namespace Trustami\TrustamiAi;

class KeywordExtractor extends Connector
{
    public function __construct(string $token)
    {
        $this->init($token);
    }

    /**
     * Summarize a text
     *
     * @param string $text
     * @param int $start
     * @param int $end
     * @param int $topN
     * @param bool $useMMR
     * @param float $diversity
     * @return array
     */
    public function extract(string $text, int $start = 1, int $end = 1, int $topN = 5, bool $useMMR = true, float $diversity = 0.0): array
    {
        $data = $this->makeRequest("/keyw", [
            "text"      => $text,
            "start"     => $start,
            "end"       => $end,
            "top_n"     => $topN,
            "use_mmr"   => $useMMR,
            "diversity" => $diversity,
        ]);

        $keywords = $data["keywords"] ?? false;

        if (!$keywords) {
            throw new \Exception("Failed to extract keywords");
        }

        return $keywords;
    }
}
