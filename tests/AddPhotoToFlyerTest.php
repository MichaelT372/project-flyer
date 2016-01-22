<?php

namespace App;

use App\AddPhotoToFlyer;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Mockery as m;

class AddPhotoToFlyerTest extends \TestCase 
{
	public function test() {
		$flyer = factory(Flyer::class)->create();

		$file = m::mock(UploadedFile::class, [
			'getClientOriginalName' => 'foo',
			'getClientOriginalExtension' => 'jpg'
		]);

		$file->shouldReceive('move')
			 ->once()
			 ->with('flyer_uploads/photos', 'nowfoo.jpg');

		$thumbnail = m::mock(Thumbnail::class);

		$thumbnail->shouldReceive('make')
				  ->once()
				  ->with('flyer_uploads/photos/nowfoo.jpg', 'flyer_uploads/photos/tn-nowfoo.jpg');

		$form = new AddPhotoToFlyer($flyer, $file, $thumbnail);

		$form->save();

		$this->assertCount(1, $flyer->photos);
	}
}

function time() {
	return 'now';
}

function sha1($path) { 
	return $path;
}