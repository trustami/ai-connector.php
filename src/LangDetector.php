<?php
namespace Trustami\TrustamiAi;

class LangDetector extends Connector
{
	public function __construct(string $token)
	{
		$this->init($token);
	}

	/**
	 * Detect language of a text
	 *
	 * @param string $text
	 * @return string
	 */
	public function detect(string $text): string
	{
		$data = $this->makeRequest("/lang", [
			"text" => $text
		]);

		$lang = $data["lang"] ?? false;

		if (!$lang) {
			throw new \Exception("Failed to detect language");
		}

		return $lang;
	}
}
