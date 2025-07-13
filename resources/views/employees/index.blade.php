@extends('layouts.app')

@section('title')
    Employees
@endsection

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
        <h3 class="mb-0">Employees</h3>
        <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Add Employee
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered table-hover align-center">
                    <thead class="table-light">
                        <tr class="text-nowrap text-start">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Date of birth</th>
                            <th>Hire Date</th>
                            <th>Salary</th>
                            <th>Image</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->date_of_birth }}</td>
                                <td>{{ $employee->hire_date }}</td>
                                <td>${{ number_format($employee->salary, 2) }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('images/'.$employee->image) }}" alt="{{ $employee->first_name }}"
                                         class="img-thumbnail" style="width: 45px; height: 45px; object-fit: cover;">
                                </td>
                                <td>{{ $employee->department->name }}</td>
                                <td>{{ $employee->position->title }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $employee->status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $employee->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-nowrap text-center">
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-dark btn-sm me-1" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="post"
                                          class="d-inline" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
