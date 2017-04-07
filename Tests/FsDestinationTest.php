<?php

namespace Enqueue\Fs\Tests;

use Enqueue\Fs\FsDestination;
use Enqueue\Psr\PsrQueue;
use Enqueue\Psr\PsrTopic;
use Enqueue\Test\ClassExtensionTrait;
use Makasim\File\TempFile;

class FsDestinationTest extends \PHPUnit_Framework_TestCase
{
    use ClassExtensionTrait;

    public function testShouldImplementsTopicAndQueueInterfaces()
    {
        $this->assertClassImplements(PsrTopic::class, FsDestination::class);
        $this->assertClassImplements(PsrQueue::class, FsDestination::class);
    }

    public function testCouldBeConstructedWithSplFileAsFirstArgument()
    {
        $splFile = new \SplFileInfo((string) TempFile::generate());

        $destination = new FsDestination($splFile);

        $this->assertSame($splFile, $destination->getFileInfo());
    }

    public function testCouldBeConstructedWithTempFileAsFirstArgument()
    {
        $tmpFile = new TempFile((string) TempFile::generate());

        $destination = new FsDestination($tmpFile);

        $this->assertSame($tmpFile, $destination->getFileInfo());
    }

    public function testShouldReturnFileNameOnGetNameCall()
    {
        $splFile = new \SplFileInfo((string) TempFile::generate());

        $destination = new FsDestination($splFile);

        $this->assertSame($splFile->getFilename(), $destination->getName());
    }

    public function testShouldReturnFileNameOnGetQueueNameCall()
    {
        $splFile = new \SplFileInfo((string) TempFile::generate());

        $destination = new FsDestination($splFile);

        $this->assertSame($splFile->getFilename(), $destination->getQueueName());
    }

    public function testShouldReturnFileNameOnGetTopicNameCall()
    {
        $splFile = new \SplFileInfo((string) TempFile::generate());

        $destination = new FsDestination($splFile);

        $this->assertSame($splFile->getFilename(), $destination->getTopicName());
    }
}
