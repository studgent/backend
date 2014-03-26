@extends('layouts.master')

@section('content')

    <div class="container w">
        <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2">
            <h4><b>CAL</b></h4>
            </div>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/cal</b></h5>
            <p>
                Gefilterde kalender-items voor evenementen, geordend in oplopende datum.
            </p>
            <p>
                Filter: enkel evenementen die nog in toekomst liggen.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/cal/all</b></h5>
            <p>
               Alle kalender-items voor evenementen, geordend in oplopende datum.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/cal/page/{perpage}/{page}</b></h5>
            <p>
               Kalender items per pagina.
            </p>
            <p>
               Parameters:
               <ul>
                  <li>{perpage} : aantal items per pagina</li>
                  <li>{page}: paginanummer</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/cal/id/{id}</b></h5>
            <p>
               Kalender item met id.
            </p>
            <p>
               Parameters:
               <ul>
                  <li>{id} : id van kalender item</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/cal/name/{keyword}</b></h5>
            <p>
               Kalender item met bepaald sleutelwoord in item naam.
            </p>
            <p>
               Parameters:
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
            <h5><b>{{ Request::root() }}/poi</b> &amp; <b>{{ Request::root() }}/poi/all</b></h5>
            <p>
                Points of Interest items.
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/poi/page/{perpage}/{page}</b></h5>
            <p>
               POI items per pagina.
            </p>
            <p>
               Parameters:
               <ul>
                  <li>{perpage} : aantal items per pagina</li>
                  <li>{page}: paginanummer</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/poi/id/{id}</b></h5>
            <p>
               POI item met id.
            </p>
            <p>
               Parameters:
               <ul>
                  <li>{id} : id van POI item</li>
               </ul>
            </p>
        </div><!-- row -->
        <div class="row left">
            <h5><b>{{ Request::root() }}/poi/name/{keyword}</b></h5>
            <p>
               POI item met bepaald sleutelwoord in POI naam.
            </p>
            <p>
               Parameters:
               <ul>
                  <li>{keyword} : sleutelwoord</li>
               </ul>
            </p>
        </div><!-- row -->
    </div>

@stop
