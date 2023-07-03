<main id="main" class="main">
    <table class="table table-bordered mt-5">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>PermissionName</th>
              </tr>
          </thead>
          <tbody>
              @foreach($permissions as $permission)
              <tr>
                  <td>{{ $permission->id }}</td>
                  <td>{{ $permission->name }}</td>
              </tr>
              @endforeach
          </tbody>
    </table>
</main>