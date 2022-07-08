@extends('layouts.main')

@section('content')
<!-- component -->
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
      <form action="{{route('members.store')}}" method="POST">
        @csrf
        <div class="mb-5">
          <label
            for="noid"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            NO ID
          </label>
          <input
            type="text"
            name="noid"
            id="noid"
            placeholder="Nomor ID"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            required
          />
        </div>
        <div class="mb-5">
          <label
            for="nama"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Nama Lengkap
          </label>
          <input
            type="nama"
            name="nama"
            id="nama"
            placeholder="Nama Lengkap"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            required
          />
        </div>
        <div class="mb-5">
          <label
            for="telepon"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Nomor Telepon
          </label>
          <input
            type="text"
            name="telepon"
            id="telepon"
            placeholder="Nomor Telepon"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            required
          />
        </div>
        <div class="mb-5">
          <label
            for="alamat"
            class="mb-3 block text-base font-medium text-[#07074D]"
          >
            Alamat
          </label>
          <textarea
            rows="4"
            name="alamat"
            id="alamat"
            placeholder="Alamat lengkap"
            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            required
          ></textarea>
        </div>
        <div class="mb-5">
            <label
              for="upline"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
              Upline
            </label>
            <select name="upline" id="upline"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                <option value="">Select Upline</option>
                @foreach ($uplines as $upline)
                <option value="{{$upline->id}}">{{$upline->nama}}</option>
                @endforeach
            </select>
          </div>
        <div>
          <button
          type="submit"
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
          >
            Save
          </button>
          <a href="{{route('members.index')}}" class="hover:shadow-form rounded-md bg-orange-500 py-3 px-8 text-base font-semibold text-white outline-none">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
