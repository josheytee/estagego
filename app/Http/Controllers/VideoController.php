<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class VideoController extends Controller
{
    public function index($id)
    {
        $howToVideos = Faq::where('category_id', '=', 4)->get();

        return view('video', compact('howToVideos'));
    }
}
