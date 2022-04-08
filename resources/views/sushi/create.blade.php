@extends('default')


@section('title')
Dieren toevoegen
@endsection

@section('content')
<button class="sushiCard__button" onclick="window.location.href='/'">  Terug  </button>
<article class="create-form a-popup">
    <form class="create-form__form" action="/sushi" method="POST">
        @csrf 

        <section class="create-form__section">
            <label for="name">Naam </label>
            <input class="create-form__input" name="name" id="name" type="text" />
        </section>

        <section class="create-form__section">
            <label for="species">Soort </label>
            <select class="create-form__input" id="species" name="species">
                @foreach($kind_of_animal as $kind_of_animal)
                    <option value={{$kind_of_animal->species}}> {{$kind_of_animal->species}} </option>
                @endforeach
            </select>
        </section>

        <section class="create-form__section">
            <label for="breed">Ras </label>
            <input class="create-form__input" name="breed" id="breed" type="text" />
        </section>

        <section class="create-form__section">
            <label for="age">Leetijd </label>
            <input class="create-form__input" name="age" id="age" type="number" />
        </section>

        <section class="create-form__section">
            <label for="description">Description </label>
            <textarea class="create-form__input create-form__input--big" name="description" id="description" type="text-area"> </textarea>
        </section>

        <section class="create-form__section">
            <label for="image">Afbeelding </label>
            <select class="create-form__input" name="image" id="image">
                @foreach($images as $image)
                    <option value={{$image->image}}> {{$image->image}} </option>
                @endforeach
            </select>
        </section>

        <section class="create-form__section">
            <button class="create-form__button type="submit>Dier toevoegen</button>
        </section>
    </form>
</article>
@endsection