Dear
{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email }}
{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : Auth::user()->email }}
,<br>
Your paper has been -----