@extends('layout.layout_admin.admin')

@section('title')
تدبير الأشطة
@endsection

@section('content')
    
	<!-- Main content -->
<h2 class="mb-4">تدبير الأنشطة</h2>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
        @foreach ($errors->all() as $error )
        <li>{{$error}}</li>
        @endforeach
          

        </div>
        @endif

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
            {{ session()->put('status',null
            ) }}

        </div>
        @endif

		 <!-- Main content -->
     <section class="content">

      
	
      <div class="container-fluid">
           <div class="row">
             <!-- left column -->
             <div class="col-md-12">
               <!-- jquery validation -->
               <div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">إضافة نشاط</small></h3>
                 </div>
                 <!-- /.card-header -->
                 <!-- form start -->
                  {!!Form::open(['action' => 'App\Http\Controllers\ActivityController@saveActivity','method'=>'POST','class'=>'form-horizontal',
                    'enctype'=>'multipart/form-data'])!!}
                   {{csrf_field()}}
                   <div class="card-body">
                     <div class="form-group">
                      <table class="table table-bordered text-center">
                        <tbody>
                         <tr>
                           <td colspan="4">
                             <img src="{{ asset('/admin/images/logo.png')}}" style="height : 100px; width : 400px">
               
                           </td>
                         </tr>
                          <tr>
                           <th colspan="4">
                               <ul class="nolist">
                                   <li> الأكاديمية الجهوية للتربية والتكوين لجهة سوس ماسة</li>
                                   <li>مصلحة تأطير المؤسسات التعليمية والتوجيه  </li>
                                   <li> المديرية الإقليمية تارودانت </li>
                               </ul>
               
                           </th>
                         </tr>
                         <tr>
                           <th  colspan="4">بطاقة زيارة </th>
                         </tr>
                         <tr>
                           <th>اسم المستشار في التوجيه :عزيز بوفريوا</th>
                           <th>الثانوية التأهيلية عبد الله بن عباس</th>
                           <th>{{ Form::date('fixture_date', Carbon\Carbon::now()->format('m/d/Y')) }}</th>
                           <th> الموسم الدراسي : 2021-2022   </th>
                         </tr>
                       </tbody>
                     </table>


                     <table class="table table-bordered text-center">
                      <tbody>
                       <tr>
                         <th>المحور </th>
                         <th> موضوع الزيارة/ النشاط  </th>
                         <th> الفئة المستهدفة</th>
                         <th>  المتدخلون</th>
                       </tr> 
                       <tr>
                         <td>تقديم خدمة الإعلام المدرسي والمهني	</td>
                         <td> تحيين السبورة الإعلامية للتوجيه:
                          <br>
                          إعلانات دراسية وتكوينية<br>
                         - التكوين المهني مستوى تقني و تقني متخصص
                         إعادة تقاسم رقم هاتف و صفحة المستشار <br>
                          </td>
                         <td>جميع تلاميذ المؤسسة</td>
                         <td> الإطار في التوجيه التربوي</td>
                       </tr>
                       <br>
                       <tr>
                        <th  colspan="4">توصيف النشاط</th>
                      </tr>
                      <tr>
                        <td  colspan="4">هناك حقيقة مثبتة منذ زمن طويل وهي
                           أن المحتوى المقروء لصفحة
                           ما سيلهي القارئ عن التركيز على الشكل
                           الخارجي للنص أو شكل توضع الفقرات في
                           الصفحة التي يقرأها. ولذلك يتم استخدام 
                          طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ
                           -إلى حد ما- للأحرف عوضاً عن استخدام 
                          "هنا يوجد محتوى نصي، هنا يوجد محتوى نصي" فتجعلها تبدو 
                          (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي
                           وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم
                           بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال "lorem ipsum"
                            في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. 
                            على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم،
                             أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية
                           إليها.</td>
                      </tr>
                       <tr>
                        <th  colspan="4">الصعوبات و الإكراهات</th>
                      </tr>
                      <tr>
                        <td  colspan="4">  
                          -	عدم توفر فضاء خاص بالتوجيه التربوي.<br>
                          -	عدم تمكين مصلحة تأطير المؤسسات والتوجيه المستشار في التوجيه من العدة اللازمة لإنجاز مهامه.<br>
                          -	نشتغل ونتنقل من مالنا الخاص.

                        </td>
                      </tr>
                     </tbody>
                   </table>

                      {{Form::label('','إسم الأكاديمية')}}
                      {{Form::text('academy_name','',['placeholder'=>'أدخل إسم الأكاديمية','class'=>'form-control'])}}

                        </div>
                   </div>

                   <!-- /.card-body -->
                   <div class="card-footer ">
                     <div class="col-md-12 bg-right text-right">
                      {{Form::submit('حفظ',['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                   </div>
                   </div>
               </div>
               <!-- /.card -->
               </div>
         
           </div>
           <!-- /.row -->
       
     </div><!-- /.container-fluid -->


 
 
 <br>
     <div class="container-fluid">
   
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">لائحة الأكاديميات</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>رقم.</th>
                   <th>إسم الأكاديمية</th>
                   <th>أجراءات</th>
                 </tr>
                 </thead>
                 <tbody>
                
                 <tr>
                   <td>1</td>
                   <td>فثسف </td>
                   <td>
                    <a href="#" class="btn btn-primary "><i class="nav-icon fas fa-edit">  </i></a>
                    <a href="#" class="btn  btn-info "><i class="nav-icon fas fa-print"></i></a>
                    <a href="#" id="delete" class="btn btn-danger " ><i class="nav-icon fas fa-trash">  </i></a>
                  </td>
                 </tr>
                 </tbody>
                 <tfoot>
                 <tr>
                  <th>رقم.</th>
                   <th>إسم الأكاديمية</th>
                   <th>أجراءات</th>
                 </tr>
                 </tfoot>
               </table>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
     </div>
     <!-- /.container-fluid -->
   </section>
	
@endsection

@section('scripts')

<script>
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>
@endsection

