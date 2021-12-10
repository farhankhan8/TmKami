<?php

namespace App\Http\Controllers;

use App\Frontend;
use App\Language;
use App\Page;
use App\SupportAttachment;
use App\SupportMessage;
use App\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function index(){
        $activeTemplate = activeTemplate();
        $count = Page::where('tempname',$activeTemplate)->where('slug','home')->count();
        if($count == 0){
            $in['tempname'] = $activeTemplate;
            $in['name'] = 'HOME';
            $in['slug'] = 'home';
            Page::create($in);
        }
        
        $data['page_title'] = 'Home';
        $data['sections'] = Page::where('tempname',$activeTemplate)->where('slug','home')->firstOrFail();
        return view($activeTemplate . 'home', $data);
    }

    public function blog()
    {
        $activeTemplate = activeTemplate();
        $count = Page::where('tempname',$activeTemplate)->where('slug','blog')->count();
        if($count == 0){
            $in['tempname'] = $activeTemplate;
            $in['name'] = 'Blog';
            $in['slug'] = 'blog';
            Page::create($in);
        }
        $data['page_title'] = 'Blog';
        $data['sections'] = Page::where('tempname',$activeTemplate)->where('slug','blog')->firstOrFail();
        $data['blogs'] = Frontend::where('data_keys','blog.element')->orderBy('id','desc')->paginate(getPaginate());
        return view($activeTemplate . 'blog.blogs', $data);
    }

    public function blogDetail($id)
    {
        $page_title = "Blog Details";
        $blog = Frontend::findOrFail($id);
        if(!$blog || $blog->data_keys != 'blog.element'){
            return view('errors.404');
        }
        $blog->increment('view');
        $blogs = Frontend::where('data_keys','blog.element')->get();
        return view(activeTemplate() . 'blog.details', compact('page_title','blog','blogs'));
    }

    public function about()
    {
        $activeTemplate = activeTemplate();
        $count = Page::where('tempname',$activeTemplate)->where('slug','about')->count();
        if($count == 0){
            $in['tempname'] = $activeTemplate;
            $in['name'] = 'About';
            $in['slug'] = 'about';
            Page::create($in);
        }
        $data['page_title'] = 'About';
        $data['sections'] = Page::where('tempname',$activeTemplate)->where('slug','about')->firstOrFail();
        return view($activeTemplate . 'about', $data);
    }

        
    public function Payment()
    {
        $activeTemplate = activeTemplate();
        $count = Page::where('tempname',$activeTemplate)->where('slug','Payment')->count();
        if($count == 0){
            $in['tempname'] = $activeTemplate;
            $in['name'] = 'Payment';
            $in['slug'] = 'Payment';
            Page::create($in);
        }
        $data['page_title'] = 'Payment';
        $data['sections'] = Page::where('tempname',$activeTemplate)->where('slug','Payment')->firstOrFail();
        return view($activeTemplate . 'Payment', $data);
    }
    
    public function pages($slug)
    {
        $activeTemplate = activeTemplate();
        $page = Page::where('tempname',$activeTemplate)->where('slug',$slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view($activeTemplate . 'pages', $data);
    }


    public function contact()
    {
        $activeTemplate = activeTemplate();
        $count = Page::where('tempname',$activeTemplate)->where('slug','contact')->count();
        if($count == 0){
            $in['tempname'] = $activeTemplate;
            $in['name'] = 'Contact';
            $in['slug'] = 'contact';
            Page::create($in);
        }
        $data['page_title'] = 'Contact';
        $data['sections'] = Page::where('tempname',$activeTemplate)->where('slug','contact')->firstOrFail();
        return view($activeTemplate . 'contact', $data);
    }


    public function contactSubmit(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();

        $imgs = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

        $this->validate($request, [
            'attachments' => [
                'sometimes',
                'max:4096',
                function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
                    foreach ($imgs as $img) {
                        $ext = strtolower($img->getClientOriginalExtension());
                        if (($img->getSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg, pdf images are allowed");
                        }
                    }
                    if (count($imgs) > 5) {
                        return $fail("Maximum 5 images can be uploaded");
                    }
                },
            ],
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);


        $random = getNumber();

        $ticket->user_id = auth()->id();
        $ticket->name = $request->name;
        $ticket->email = $request->email;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $path = imagePath()['ticket']['path'];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $image) {
                try {
                    SupportAttachment::create([
                        'support_message_id' => $message->id,
                        'image' => uploadImage($image, $path),
                    ]);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload your ' . $image];
                    return back()->withNotify($notify)->withInput();
                }

            }
        }
        $notify[] = ['success', 'ticket created successfully!'];

        return redirect()->route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function lang($lang){
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function policy($id,$slug){
        $item = Frontend::where('id',$id)->where('data_keys','footer_link.element')->firstOrFail();
        $page_title = $item->data_values->title;
        return view(activeTemplate().'policy',compact('page_title','item'));
    }

}
