<article class="informatieGridcard a-popup">
<form class="create-form__form" action="/owners" method="POST">
    @csrf
    <section class="create-form__section">
            <label for="name">Naam </label>
            <select class="create-form__input" id="name" name="name">
                @foreach($animals as $animal)
                    <option value={{$animal->name}}> {{$animal->name}} </option>
                @endforeach
            </select>
        </section>

    <button class="create-form__button" type="submit">Verwijder</button>

</form>
</article>