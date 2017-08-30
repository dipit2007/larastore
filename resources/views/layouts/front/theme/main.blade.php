@extends('layouts.front.theme.base')



    @section('stylecustomizer')

      @include('layouts.front.theme.stylecustomizer')

    @endsection



    @section('topbarpreheader')
    @include('layouts.front.theme.topbarpreheader')
    @endsection
    
    @section('header')
    @include('layouts.front.theme.header')
    @endsection
    
   
    
    
    
        
        

          @section('sidebar')
          @include('layouts.front.theme.sidebar')
          @endsection

          @section('content')
          @include('layouts.front.theme.content')
          @endsection
          
       

        


    @section('brands')
    @include('layouts.front.theme.brands')
    @endsection
    

    @section('steps-block')
    @include('layouts.front.theme.steps-block')
    @endsection
    

    @section('pre-footer')
    @include('layouts.front.theme.pre-footer')
    @endsection
    

    @section('footer')
    @include('layouts.front.theme.footer')
    @endsection
    

    @section('product-pop-up')
    @include('layouts.front.theme.product-pop-up')
    @endsection
    






@section('initscript')
@parent
@endsection