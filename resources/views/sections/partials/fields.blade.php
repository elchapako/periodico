{!! Form::label('section', trans('validation.attributes.section_name')) !!}
{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Write the section here...']) !!}
{!! Form::label('section', trans('validation.attributes.pages')) !!}
{!! Form::text('pages', null, ['class' => 'form-control', 'placeholder' => 'Write the number of pages here...']) !!}
{!! Form::label('isRegular', trans('validation.attributes.isregular')) !!}
{!! Form::radios('isRegular', ['1' => trans('validation.attributes.true'), '0' => trans('validation.attributes.false')])  !!}