@extends('layouts.master')

@section('content')

    <div class="container w">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h4><b>CAL</b></h4>
            </div>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/cal</b></h5>
            <p>
                Gefilterde kalender-items voor evenementen, geordend in oplopende datum.
            </p>
            <p>
                Filter: enkel evenementen die nog in toekomst liggen.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/cal/all</b></h5>
            <p>
               Alle kalender-items voor evenementen, geordend in oplopende datum.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/cal/page/{perpage}/{page}</b></h5>
            <p>
               Kalender items per pagina.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{perpage} : aantal items per pagina</li>
                  <li>{page}: paginanummer</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/cal/id/{id}</b></h5>
            <p>
               Kalender item met id.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van kalender item</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/cal/name/{keyword}</b></h5>
            <p>
               Kalender item met bepaald sleutelwoord in item naam.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{keyword} : sleutelwoord</li>
               </ul>
            </p>
        </div><!-- row -->
    </div>
    
    <div class="container w">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h4><b>POI</b></h4>
            </div>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/poi</b> &amp; <b>GET {{ Request::root() }}/poi/all</b></h5>
            <p>
                Points of Interest items.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/poi/page/{perpage}/{page}</b></h5>
            <p>
               POI items per pagina.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{perpage} : aantal items per pagina</li>
                  <li>{page}: paginanummer</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/poi/id/{id}</b></h5>
            <p>
               POI item met id.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van POI item</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/poi/name/{keyword}</b></h5>
            <p>
               POI item met bepaald sleutelwoord in POI naam.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{keyword} : sleutelwoord</li>
               </ul>
            </p>
        </div><!-- row -->
    </div>

    <div class="container w">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h4><b>User</b></h4>
            </div>
        </div><!-- row -->
        <div class="row left">
            <h5><b>POST {{ Request::root() }}/user/login</b></h5>
            <p>
                POST Data
                <ul>
                  <li><b>email</b> : email address of the user</li>
                  <li><b>password</b> : wachtwoord voor verificatie</li>
                </ul>
            </p>
            <p>
              Response: <b>user</b> info en user <b>token</b>.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/all</b></h5>
            <p>
               Alle gebruikers
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/show/{email}</b></h5>
            <p>
               User info
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{email} : email van de user</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/{id}</b></h5>
            <p>
               User info.
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van user</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/{id}/questions/unanswered</b></h5>
            <p>
               Onbeantwoorde vragen voor de gebruiker
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van user</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/{id}/questions/answered</b></h5>
            <p>
               Beantwoorde vragen voor de gebruiker
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van user</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/{id}/questions/answers</b></h5>
            <p>
               Antwoorden van de gebruiker
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van user</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>GET {{ Request::root() }}/user/{id}/questions/all</b></h5>
            <p>
               Beantwoorde en onbeantwoorde vragen voor gebruiker
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{id} : id van user</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>POST {{ Request::root() }}/user/{user_id}/questions/{question_id}</b></h5>
            <p>
               Antwoord sturen voor gebruiker
            </p>
            <p>
               Query Parameters:
               <ul>
                  <li>{user_id} : id van user</li>
                  <li>{question_id} : id van user</li>
               </ul>
            </p>
            <p>
               POST Data:
               <ul>
                  <li>{token} : token van user (verificatie)</li>
                  <li>{answer} : ingegeven antwoord op de vraag</li>
               </ul>
            </p>
        </div><!-- row -->
    </div>
@stop
