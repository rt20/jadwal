@extends('layouts.app')

@section('title','Booking Ruangan')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking Ruangan Daring/Luring</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Booking Ruangan</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div>
                    @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                    @endif
                    <form class="w-full" action="{{ route('books.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-2">
                                Nama PIC*
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('pic') }}" name="pic"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Nama Penanggung Jawab">
                            </div><br>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-2">
                                Nama Ruangan*
                            </div>
                            <div class="col-sm-10">
                                <select name="room"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" style="width: 40%;" required>
                                    <option value="">- Pilih Ruangan Daring/Luring</option>
                                    <option value="Zoom Meeting 1 (ditwas.prrs)">Zoom Meeting 1 (ditwas.prrs)</option>
                                    <option value="Zoom Meeting 2 (inspeksisedang.btp)">Zoom Meeting 2
                                        (inspeksisedang.btp)</option>
                                    <option value="Zoom Meeting 3 (peredaranpangan)">Zoom Meeting 3 (peredaranpangan)
                                    </option>
                                    <option value="Ruang Rapat Wasdar">Ruang Rapat Wasdar</option>
                                </select>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-sm-2">
                                Agenda*
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('agenda') }}" name="agenda"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Agenda">
                            </div><br>
                        </div></br>
                        <div class="row">
                            <div class="col-sm-2">
                                Peserta
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('participant') }}" name="participant"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Peserta">
                            </div></br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Jumlah Peserta
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('quantity') }}" name="quantity"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Jumlah Peserta">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Tanggal Mulai*
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="mulai"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 100%;" value="{{old('mulai')}}">
                            </div>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Waktu Mulai*
                            </div>
                            <div class="col-sm-3">
                                <select name="hours_start"
                                    class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 40%;" required>
                                    <?php foreach(range(1,23) as $i):?>
                                    <?php if($i<=9):?>
                                    <option value="<?='0'.$i?>"><?='0'.$i?></option>
                                    <?php else:?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </select>

                                <select name="minutes_start"
                                    class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 40%;">
                                    <?php foreach(range(0,59) as $i):?>
                                    <?php if($i<=9):?>
                                    <option value="<?='0'.$i?>"><?='0'.$i?></option>
                                    <?php else:?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <br>
                     
                        <div class="row">
                            <div class="col-sm-2">
                                Tanggal Selesai*
                            </div>
                            <div class="col-sm-3">
                                <input type="date" name="selesai" 
                                    class="form control appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 100%;" value="{{old('selesai')}}" placeholder="Waktu selesai kegiatan" required> 
                            </div>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Waktu Selesai*
                            </div>
                            <div class="col-sm-3">
                                <select name="hours_end"
                                    class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 40%;" required>
                                    <?php foreach(range(1,23) as $i):?>
                                    <?php if($i<=9):?>
                                    <option value="<?='0'.$i?>"><?='0'.$i?></option>
                                    <?php else:?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </select>

                                <select name="minutes_end"
                                    class="bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    style="width: 40%;">
                                    <?php foreach(range(0,59) as $i):?>
                                    <?php if($i<=9):?>
                                    <option value="<?='0'.$i?>"><?='0'.$i?></option>
                                    <?php else:?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Meeting ID
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('meetingid') }}" name="meetingid"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Meeting ID">
                            </div>
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-2">
                                Passcode
                            </div>
                            <div class="col-sm-3">
                                <input value="{{ old('password') }}" name="password"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Passcode">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Link Zoom
                            </div>
                            <div class="col-sm-9">
                                <input value="{{ old('link') }}" name="link"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="text" placeholder="Link Zoom">
                            </div></br>
                        </div>
                        <br>
                        <div class="row">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 text-right">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
