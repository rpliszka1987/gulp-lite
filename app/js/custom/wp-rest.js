function getREST (route, params, callback, dest) {
  // route =  the type 
  // param = url arguments for the REST API
  // callback = dynamic function name 
  // Pass in the name of a function and it will return the data to that function

  var endpoint = '/wp-json/wp/v2/' + route // local absolute path to the REST API + routing arguments

  jQuery.ajax({
    url: endpoint, // the url 
    data: params,
    success: function (data, textStatus, request) {
      callback(data, dest) // this is the callback that sends the data to your custom function
    },
    error: function (data, textStatus, request) {
      console.log(data.responseText)
    },

    cache: false
  })
}

function setPosts (data, dest) { // special function for the any post type
  var posts = {} // create an empty object
  for (var i = 0;i < data.length;i++) { // loop through the list of data
    posts[data[i].id] = data[i] // adds a key of the post id to address all data in the post as a JSON object
  }
  console.log('posts', posts)

  return posts
}
jQuery(document).ready(function () {
  // retrieves all projects, with fields from REST API
  getREST('project', 'fields=id,title,conent,thumbnail_url,project_info,thumbnail_versions,featured_video', setPosts) // get the projects
  // retrieves all categories for the development category
  getREST('categories', 'parent=19&fields=id,name,count,slug,description,,category_posts', setChildCategories) // returns the children of a specified parent category
  // retrieves all categories for the development category
  getREST('tags', 'fields=id,name,slug,tag_posts', setTags) // returns the tags
})
