Dear Exicutive Editor,<br>

You have received a paper from 
{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email }}
{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : Auth::user()->email }}
Paper ID: {{ $details['id']}}