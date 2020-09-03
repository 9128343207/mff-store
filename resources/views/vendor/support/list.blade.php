@extends('layouts.vendor')
@section('title')
    Home
@endsection
@section('header')
    @include('inc.v-sidebar')
    @include('inc.vendor-nav')
@endsection

@section('content')

<div class="product-status mg-b-15">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Tickets List</h4>
                    <div class="add-product">
                    <!-- <a href="{{ Route('vendor.product.listing') }}">Add Product</a> -->
                    </div>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                               

                            </tr>

                        </table>
                    </div>
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>$P$BblwkZMLU.vatLrlV9DtHH7xlTWNBm0
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!---

    /* C Program to find the maximum element in each row of a matrix */
#include<stdio.h>

void display(int result[], int n)
{
int i;
for(i = 0; i < n; i++)
{
printf(“%d “, result[i]);
}
}

void maxi_row(int mat[][3], int m, int n)
{
int i = 0, j;
int max = 0;
int result[m];
while (i < m)
{
for ( j = 0; j < n; j++)
{
if (mat[i][j] > max)
{
max = mat[i][j];
}
}
result[i] = max;
max = 0;
i++;

}
display(result, m);
}
int main()
{
int m, n;
scanf(“%d %d”,&m,&n);
int i, j;
int mat1[m][n];
for(i = 0; i < m; i++)
{
for(j = 0; j < n; j++)
scanf(“%d”,&mat1[i][j]);
}

maxi_row(mat1,m,n);
return 0;
}

