require 'net/https'
require 'uri'
require 'json'
require 'cgi'

class PagesController < ApplicationController
  include PagesHelper

  def home
    if logged_in?
      @micropost  = current_user.microposts.build
      @feed_items = current_user.feed.paginate(page: params[:page])
    end
  end

  def browse
    params[:type] = "TOP_250_BEST_FILMS"
    @movies = top
  end

  def find
    if params[:search] == ""
      @movies = top
    else
    @movies = movies
    end
  end

end
