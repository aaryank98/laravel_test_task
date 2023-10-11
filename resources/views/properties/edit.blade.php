@extends('layouts.admin')

@section('content')

<section class="bg-slate-200 h-20">
    <div class="container mx-auto">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl py-5">Edit Property</h1>
        </div>
    </div>
</section>

<section class="my-10">
    <div class="container mx-auto">

        {{ Form::open(['method' => 'PUT','route' => ['properties.update', $property->id],'enctype'=>'multipart/form-data']) }}
        <div class="space-y-12">
            <div class="">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-3">
                        {!! Form::label('county', 'County', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::text('county', $property->county,['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>

                    <div class="col-span-3">
                        {!! Form::label('country', 'Country', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::text('country', $property->country,['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>

                    <div class="col-span-3">
                        {!! Form::label('town', 'Town', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::text('town', $property->town,['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>

                    <div class="col-span-3">
                        {!! Form::label('postcode', 'Postcode', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::text('postcode', $property->postcode,['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>


                    <div class="col-span-full">
                        {!! Form::label('description', 'Description', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::textarea('description', $property->description,['class' => 'w-full rounded-md border-2 px-2 py-1.5', 'rows' => 3]); !!}
                        </div>
                    </div>

                    <div class="col-span-3">
                        {!! Form::label('address', 'Displayable Address', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::text('address', $property->address,['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>

                    <div class="col-span-3">
                        {!! Form::label('image', 'Image', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::file('image_full',['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>


                    <div class="col-span-3">
                        {!! Form::label('num_bedrooms', 'Number of bedrooms', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::select('num_bedrooms', [1,2,3,4,5,6,7,8,9,10], $property->num_bedrooms, ['class'=>'w-full rounded-md border-2 px-2 py-2 bg-white']) !!}
                        </div>
                    </div>


                    <div class="col-span-3">
                        {!! Form::label('num_bathrooms', 'Number of bathrooms', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::select('num_bathrooms', [1,2,3,4,5,6,7,8,9,10],  $property->num_bathrooms, ['class'=>'w-full rounded-md border-2 px-2 py-2 bg-white']) !!}
                        </div>
                    </div>

                    <div class="col-span-3">
                        {!! Form::label('price', 'Price', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::text('price', $property->price,['class' => 'w-full rounded-md border-2 px-2 py-1.5 ']); !!}
                        </div>
                    </div>


                    <div class="col-span-3">
                        {!! Form::label('property_type_id', 'Property Type', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::select('property_type_id', [1,2,3,4,5,6,7,8,9,10], $property->property_type_id, ['class'=>'w-full rounded-md border-2 px-2 py-2 bg-white']) !!}
                        </div>
                    </div>


                    <div class="col-span-1">
                        {!! Form::label('property_for', 'For Sale / For Rent ', ['class'=>'block text-sm font-medium leading-6 text-gray-900']) !!}
                        <div class="mt-2">
                            {!! Form::radio('property_for', 'sale', $property->property_for, ['class'=>'inline-block h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600']) !!}
                            {!! Form::label('property_for', 'Sale ', ['class'=>'inline-block text-sm font-medium text-gray-900']) !!}

                            {!! Form::radio('property_for', 'rent', $property->property_for, ['class'=>'inline-block h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600']) !!}
                            {!! Form::label('property_for', 'Rent ', ['class'=>'inline-block text-sm font-medium text-gray-900']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            {!! Form::submit('Save', ['class' => 'rounded-md bg-gray-800 px-3 py-2 text-sm text-white hover:bg-gray-500']); !!}
        </div>
        {{ Form::close() }}
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('build/assets/jquery.toast.js')}}"></script>
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('build/assets/jquery.toast.css')}}">
@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    $(document).ready(function() {
        let message = "{{$error}}";
        $.toast({
            heading: 'Error',
            text: message,
            position: 'top-right',
            icon: 'error'
        })
    });
    </script>
    @endforeach
@endif
@endsection