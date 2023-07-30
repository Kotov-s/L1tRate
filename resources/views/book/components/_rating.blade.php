<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<form class="rating">

    <label>
        <input type="radio" name="stars" value="1" />
        <span class="icon">★</span>
    </label>
    <label>
        <input type="radio" name="stars" value="2" />
        <span class="icon">★</span>
        <span class="icon">★</span>
    </label>
    <label>
        <input type="radio" name="stars" value="3" />
        <span class="icon">★</span>
        <span class="icon">★</span>
        <span class="icon">★</span>
    </label>
    <label>
        <input type="radio" name="stars" value="4" />
        <span class="icon">★</span>
        <span class="icon">★</span>
        <span class="icon">★</span>
        <span class="icon">★</span>
    </label>
    <label>
        <input type="radio" name="stars" value="5" />
        <span class="icon">★</span>
        <span class="icon">★</span>
        <span class="icon">★</span>
        <span class="icon">★</span>
        <span class="icon">★</span>
    </label>
</form>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script>
    $(':radio').change(function() {
        const value = event.target.value;
        const url = window.location.href;
        const match = url.match(/\/book\/(\d+)/);
        const bookId = match[1];


        $.ajax({
            type: "POST",
            url: '/rates/store',
            data: {
                value: value,
                bookId: bookId,
                _token: '{{ csrf_token() }}'
            },
        });
    });



    $(document).ready(function() {
        const url = window.location.href;
        const match = url.match(/\/book\/(\d+)/);
        const bookId = match[1];


        $.ajax({
            type: "GET",
            url: '/rates/check',
            data: {
                bookId: bookId,
            },
            success: function(data) {
                var radioButton = document.querySelector(
                    `input[type="radio"][value="${data.value}"]`);
                radioButton.checked = true;
            },
        });
    });
</script>
