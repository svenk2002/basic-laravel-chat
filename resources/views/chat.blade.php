<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
    
    <div class="row mt-5">
        <div class="col-md-6">
           <h1>Public live chat:</h1>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" id="chat-message" placeholder="Type a message">
            
            <button class="btn btn-primary mt-3" type="button" id="chat-submit">
                Send
            </button>

            {{-- Second loading button --}}
            <button class="btn btn-primary mt-3 hidden d-none" id="loading-btn" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>

         </div>
    </div>    

    <div id="chat-messages">
        {{-- Shows all the chat messages --}}
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    //add crsf to all the tokenes
    $.ajaxSetup({
        headers: {
            'accept': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="/js/chat.js"></script>
