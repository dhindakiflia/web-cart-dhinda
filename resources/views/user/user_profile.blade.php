@extends('auth.layout')

@section('nama_1')
    
@endsection

@section('content')
<section class="section is-medium">
        <div class="container box">
            <div class="content is-normal">
                <h2>User Detail
                    @if ($detail_user->status == 'utama')
                        <span class="tag is-rounded">Utama</span>
                    @else
                        
                    @endif
                </h2>
                <table class="table ">
                    <tbody>
                        <tr>
                            <td><p><i class="fa-solid fa-user" style="color: #707070;"></i> {{ $detail_user->name }}</p></td>
                            <td><p><i class="fa-solid fa-phone" style="color: #707070;"></i> {{ $detail_user->phone }}</p></td>
                            <td><p><i class="fa-solid fa-location-dot" style="color: #707070;"></i> {{ $detail_user->address }}</p></td>
                            
                        </tr>
                    </tbody>
                </table>
              </div>
        </div>
    </section>
    </form>
@endsection