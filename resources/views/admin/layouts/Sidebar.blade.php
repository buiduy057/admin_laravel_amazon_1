<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="admin/dist/img/admin.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{$user->name}}</p>
        <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="{{route('listProduct')}}">
          <i class="fa fa-files-o"></i>
          <span>Product</span>
        </a>
      </li>
      <li>
        <a href="{{route('ebayHome')}}">
          <i class="fa fa-envelope"></i> <span>Ebay</span>
        </a>
      </li>
     
    </ul>
  </section>
</aside>