@props(['errors'])

@if ($errors->any())
    {{-- <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Quelque chose s\'est mal passé') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}

    <div 
                        class="bs-toast toast toast-placement-ex m-2 fade bg-danger top-0 end-0 show"
                        role="alert"
                        aria-live="assertive"
                        aria-atomic="true"
                        data-delay="2000"
                        id="toast-box"
                      >
                        <div class="toast-header">
                          <i class="bx bx-bell me-2"></i>
                          <div class="me-auto fw-semibold">{{ __('Whoops! Quelque chose s\'est mal passé.') }}</div>
                          <small id="counter"></small>
                          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </div>
                      </div>

    <script>
        function countdown(minutes) {
        let seconds = 10;
        let mins = minutes
        function tick() {
        //This script expects an element with an ID = "counter". You can change that to what ever you want. 
        let counter = document.getElementById("counter");
        let current_minutes = mins-1
        seconds--;
        counter.innerHTML = current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            setTimeout(tick, 1000);
        } else {
            document.querySelector('.btn-close').click();
           
            if(mins > 1){
                countdown(mins-1);           
            }
            
        }
        }
        
    tick();
}
//You can use this script with a call to onclick, onblur or any other attribute you would like to use. 
countdown(1);
    </script>
@endif
