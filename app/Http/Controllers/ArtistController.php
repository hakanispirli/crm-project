<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function Artist()
    {
        return view('artist.all_artist');
    }

    public function AllArtist()
    {
        $artists = Artist::all();
        return response()->json(['success' => true, 'artists' => $artists]);
    }

    public function AddArtist(Request $request)
    {
        $validatedData = $request->validate([
            'artist_name' => 'required|string|max:255',
            'artist_email' => 'required|email|unique:artists|max:255',
            'artist_telefon' => 'required|string|max:20',
        ]);

        $artist = new Artist();
        $artist->artist_name = $validatedData['artist_name'];
        $artist->artist_email = $validatedData['artist_email'];
        $artist->artist_telefon = $validatedData['artist_telefon'];
        $artist->save();

        return response()->json(['success' => true, 'message' => 'Sanatçı başarıyla eklendi']);
    }

    public function EditArtist($id)
    {
        $artist = Artist::find($id);
        return view('artist.edit_artist', compact('artist'));
    }

    public function UpdateArtist(Request $request)
    {
        $artist_id = $request->id;

        Artist::find($artist_id)->update([
            'artist_name' => $request->artist_name,
            'artist_email' => $request->artist_email,
            'artist_telefon' => $request->artist_telefon,
        ]);

        $notification = array(
            'message' => 'Sanatçı Bilgileri Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('artist')->with($notification);

    }

    public function DeleteArtist($id)
    {
        $artist = Artist::find($id);
        $artist->delete();

        $notification = array(
            'message' => 'Sanatçı Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('artist')->with($notification);
    }
}
