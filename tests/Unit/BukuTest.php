<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Buku;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BukuTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBookHasData()
    {
        $books = Buku::create([
            'judul' => 'Maddah',
            'penulis' => 'Risa',
            'penerbit' => 'Mediakita',
            'jumlah' => 10,
            'tanggal_regis' => date('y-m-d'),
            'cover' => 'default.jpg'
        ]);

        $this->assertDatabaseHas('buku', [
            'judul' => 'Maddah',
            'penulis' => 'Risa',
            'penerbit' => 'Mediakita',
            'jumlah' => 10,
            'tanggal_regis' => date('y-m-d'),
            'cover' => 'default.jpg'
        ]);
        // $this->assertTrue(true);

        Buku::find($books->id)->update([
            'judul' => 'Maddah',
            'penulis' => 'Risa Saraswati',
            'penerbit' => 'Mediakita',
            'jumlah' => 10,
            'tanggal_regis' => date('y-m-d'),
            'cover' => 'default.jpg'
        ]);
        $this->assertDatabaseHas('buku', [
            'judul' => 'Maddah',
            'penulis' => 'Risa Saraswati',
            'penerbit' => 'Mediakita',
            'jumlah' => 10,
            'tanggal_regis' => date('y-m-d'),
            'cover' => 'default.jpg'
        ]);


        Buku::destroy($books->id);
        $this->assertDatabaseMissing('buku', [
            'judul' => 'Maddah',
            'penulis' => 'Risa Saraswati',
            'penerbit' => 'Mediakita',
            'jumlah' => 10,
            'tanggal_regis' => date('y-m-d'),
            'cover' => 'default.jpg'
        ]);
    }

    
}
