class ContentsController < ApplicationController
  def new
    @content = Content.new
  end

  def create

  end

  def show
    uri = URI("https://kinopoiskapiunofficial.tech/api/v2.2/films/")
    http = Net::HTTP.new(uri.host, uri.port)
    http.use_ssl = true
    request = Net::HTTP::Get.new(uri.path + params[:id], {'Content-Type' => 'application/json', "X-API-KEY"=> ENV['KINOPOISK_TOKEN']})
    response = http.request(request)
    @content = JSON.parse(response.body)
  end
end
