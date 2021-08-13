@component('mail::message')
##  <h2>Nom & Prénom(s) : {{ $fullname }}</h2>
### <h3>Email : {{ $email }}</h3>
### <h3>Téléphone : {{ $phone }}</h3>
### <h3>Objet : {{ $subject }}</h3>
<br>
@component('mail::panel')
{{ $message }}
@endcomponent



@endcomponent

