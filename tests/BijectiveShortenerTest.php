<?php

use Reshadman\BijectiveShortener\BijectiveShortener;

class BijectiveShortenerTest extends PHPUnit_Framework_TestCase {

	/**
	 * Test pack shortener create from integer method
	 *
	 * @return void
	 */
	public function testBijectiveShortenerMakeFromIntegerMethod()
	{
		ini_set('memory_limit', -1);

		$coded = [];

		for ($i = 5000000; $i <= 5001000; $i++)
		{
			$encoded = BijectiveShortener::makeFromInteger($i);

			$this->assertArrayNotHasKey($encoded, $coded);

			$this->assertEquals($i, BijectiveShortener::decodeToInteger($encoded));

			$coded[$encoded] = $i;
		}
	}
}
