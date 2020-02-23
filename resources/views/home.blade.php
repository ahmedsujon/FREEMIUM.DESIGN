$subscribers = Subscriber::all();
foreach ($subscribers as $subscriber) {
Notification::route('mail', $subscriber->email)
->notify(new NewItemNotify($items));
}



$tag = Tag::where('slug', $slug)->first();
return view('fontend.tag_item', compact('tag'));
