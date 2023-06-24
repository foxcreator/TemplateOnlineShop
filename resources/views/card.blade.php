<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img src="{{ asset('Images/' . $product->image) }}" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{ $product->name }}</h3>

            <p>{{ $product->price }} ₴</p>
            {{ $product->category->name }}

            <p>
            <form action="{{ route('basket-add', $product->id) }}" method="POST">
                <button type="submit" class="btn btn-success" role="button">В кошик</button>
                <a href="{{ route('product', [$product->category->id, $product->id]) }}"
                   class="btn btn-default"
                   role="button">Детальніше</a>
                @csrf
            </form>
            </p>

        </div>
    </div>
</div>
