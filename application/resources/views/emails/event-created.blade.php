<DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h2>You Are Invited TO Our Event At {{$event->location_name}}</h2>

    <a class='link-default' href='https://maps.google.com/?q={{$event->latitude}},{{$event->longitude}}'>Show On Maps</a>

    <p>Date : {{$event->date_time}}</p>
    <h3>Details </h3>
    <?php $fields = json_decode($event->extra_fields); ?>
    @foreach($fields as $key => $field)
        <p>{{$key}} : {{$field}}</p>
    @endforeach
    </body>
    </html>
