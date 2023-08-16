@extends('layouts.default')

@section('content')

  <div>
    <section id="not-found">
     <!-- <h2 class="bg-info"> {{ $exception->getMessage() }}</h2> -->
      <div class="main-div">
        <img src="{{ URL::asset('/image/logo.png') }}" height="150px" width="200px" alt="Agrimax Logo" />
        <h2> 404 - We couldn't find that page.</h2>
        <h3>Maybe you can find what you need here?</h3>
        <div>
         <a href="/home">
         <button type="button"
            class="btn">
           <!-- <Button label="back to home" hasicon rounded success base> -->
             <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
             </svg>
            <span class="btn-label">Back to home</span>
           <!-- </Button> -->
          </button>
         </a>
        </div>
       </div>
    </section>
  </div>
@stop

<style>
  #not-found {
    position: relative;
    height: 80vh;
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
  }

  #not-found .main-div {
    text-align: center;
  }

  #not-found h2 {
    font-weight: bold;
    margin-bottom: 32px;
    color: #000;
    font-size: 42px;
    line-height: 40px;
  }

  a {
    text-decoration: none !important;
  }

  #not-found h3 {
    font-weight: normal;
    margin-bottom: 32px;
    font-size: 20px;
    line-height: 28px;
  }

  #not-found .btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 10px 20px;
    text-align: center;
    color: white;
    background: rgb(4 108 78 / 1);
    border: 1px solid rgb(4 108 78 / 1);
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    border-radius: 8px;
    box-shadow: none;
  }

  #not-found .btn:hover {
    background: rgb(3 84 63 / 1);
  }

  /* #not-found .btn:focus {
    color: white;
    outline-offset: 2px;
    outline: 2px solid transparent;
  } */

  #not-found .btn-label {
    margin-left: 8px;
  }



  @media screen and (max-width: 576px) {
    #not-found {
     padding-top: 48px;
     padding-bottom: 48px;
    }

    #not-found h2 {
     font-size: 36px;
     line-height: 40px;
    }

    #not-found h3 {
     font-size: 24px;
     line-height: 32px;
    }
  }
</style>