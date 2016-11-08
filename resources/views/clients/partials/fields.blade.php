<div class="caption">
    {!! Form::label('full_name', trans('validation.attributes.full_name')) !!}
    {!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Write the full name here...']) !!}
    {!! Form::label('phone', trans('validation.attributes.phone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Write the phone here...']) !!}
    {!! Form::label('cellphone', trans('validation.attributes.cellphone')) !!}
    {!! Form::text('cellphone', null, ['class' => 'form-control', 'placeholder' => 'Write the cellphone here...']) !!}
    {!! Form::label('ci', trans('validation.attributes.id')) !!}
    {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Write the identification card here...']) !!}
    {!! Form::label('address', trans('validation.attributes.address')) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Write the address here...']) !!}
    {!! Form::label('email', trans('validation.attributes.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Write the email here...']) !!}
</div>