Dear 
{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email }}
{{ isset(Auth::user()->last_name) ? Auth::user()->last_name : Auth::user()->email }}
,<br>

You have successfully submitted your paper.<br>
Paper ID: {{ $details['id']}}<br>
Thank you very much for the submission of your paper. We will take care of it and you can know the status of your paper through our system response. 
    We will communicate with you through email if necessary.