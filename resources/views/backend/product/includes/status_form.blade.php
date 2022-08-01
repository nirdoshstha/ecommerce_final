<div class="col-lg-12">


      <div class="form-group row">
        <div class="col-3">
            {{ Form::label('status', 'Status :',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('status',1, false) }} Hide </label>
            <label class="radio-inline">
            {{ Form::radio('status',0, true) }} Show </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('new_arrival', 'New Arrivals :',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('new_arrival',1, true) }} Active </label>
            <label class="radio-inline">
            {{ Form::radio('new_arrival',0, false) }} In-Active </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('featured_products', 'Featured Products :',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('featured_products',1, true) }} Active </label>
            <label class="radio-inline">
            {{ Form::radio('featured_products',0, false) }} In-Active </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('popular_products', 'Popular Products :',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('popular_products',1, true) }} Active </label>
            <label class="radio-inline">
            {{ Form::radio('popular_products',0, false) }} In-Active </label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-3">
            {{ Form::label('offer_products', 'Offer Products :',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('offer_products',1, true) }} Active </label>
            <label class="radio-inline">
            {{ Form::radio('offer_products',0, false) }} In-Active </label>
        </div>
    </div>


</div>
