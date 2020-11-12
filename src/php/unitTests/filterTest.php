<?php 

//In order to preform test run unitTestHelper.php first. Then use command /vendor/bin/phpunit.


use PHPUnit\Framework\TestCase;


class FirstTest extends TestCase{
    public function testGrayscale(): void
    {
        $this->assertFileExists('../../tmp_store/grayDownload.png');
    }

        public function testNegative(): void
    {
        $this->assertFileExists('../../tmp_store/negDownload.png');
    }

    public function testSharpen(): void
    {
        $this->assertFileExists('../../tmp_store/sharpDownload.png');
    }

}

















?>