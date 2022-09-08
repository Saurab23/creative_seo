@extends('frontend.frontendLayout.app')
@section('content')

<body>
    <section class="blog-single-biography-post py-4">
        <div class="container">
            <div class="row">
                <div class="co1-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="blog-single-post-header">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="#">Creative SEO</a></li>
                                <li class="breadcrumb-item"><a href="#">Biography</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $biography->title }}</li>
                            </ol>
                        </nav>
                        <h2 class="blog-single-post-title lh-1">{{ $biography->title }}<span class="text-muted opacity-25 ps-2 ps-2">Biography<i class="fa-solid fa-circle-check ps-2"></i></span></h2>
                        <h5 class="blog-single-post-subtitle text-muted opacity-50 lh-1">(Actor)</h5>
                        <div class="blog-single-post-meta mb-4">
                            <span class="blog-single-post-meta-date">
                                Posted on&nbsp;<span>{{ $biography->updated_at }}</span>
                            </span>
                            <span class="blog-single-post-meta-author">
                                &nbsp;by&nbsp;<span>{{ ($biography->createdBy!=null)?$biography->createdBy->name:'N/A'}}</span>
                            </span>
                            <span class="blog-single-post-meta-cats">
                                in&nbsp;
                                <a href="{{ route('biography.index') }}">Biography</a>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                            <div id="leftSidebar" class="sidebar-section left-Sidebar">
                                <div class="blog-single-post-sidebar sidebar-inner">
                                    <div class="blog-single-biography-details">
                                        <figure class="mb-0">
                                            <div class="blog-item-thumb zoom image is-1by1 mb-0">
                                                <a href="#">
                                                    <img src="{{ (!empty($biography->biography_photo))?url('uploads/biography-image/'.$biography->biography_photo):url('uploads/biography-image/no-image.png') }}" alt="Conrad Hughes Hilton" class="img-fluid">
                                                </a>
                                                <div class="ribbon-item">
                                                    <div class="ribbon-item-inner">
                                                        {{ $biography->relationship_status }}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="figure-caption text-center py-1"><span>Source:-</span>&nbsp;The Famous People</div> --}}
                                        </figure>
                                        <section class="blog-single-biography-facts">
                                            <h5 class="mb-0 py-2">Quick Facts of <span>{{ $biography->title }}</span></h5>
                                            <table class="facts">
                                                <tbody>
                                                    <tr>
                                                        <th>Age:</th>
                                                        <td>5 years 11 months</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birth Date:</th>
                                                        <td><a href="">{{ $biography->birth_date }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Horoscope (Sunshine):</th>
                                                        <td><a href="#">Virgo</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Full Name:</th>
                                                        <td>Edward Aszard Rasberry</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Birth Place:</th>
                                                        <td><a href="#">Beverly Hills California, USA</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ethnicity:</th>
                                                        <td><a href="#">Mixed (Indo-Trinidadian, Afro-Panamanian)</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nationality:</th>
                                                        <td><a href="#">American</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Father's Name:</th>
                                                        <td>Vaughn Rasberry</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mother's Name:</th>
                                                        <td>Tatyana Ali</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Hair Color:</th>
                                                        <td><a href="#">Black</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Eye Color:</th>
                                                        <td><a href="#">Black</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lucky Number:</th>
                                                        <td>7</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lucky Stone:</th>
                                                        <td>Sapphire</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lucky Color:</th>
                                                        <td>Green</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Best Match for Marriage:</th>
                                                        <td>Taurus, Capricorn</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Last Update:</th>
                                                        <td>August, 2022</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">
                                                            <h3 class="stats">Social Media</h3>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Facebook Profile/Page:</th>
                                                        <td>
                                                            <a href="https://www.facebook.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-facebook-f"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Twitter Profile:</th>
                                                        <td>
                                                            <a href="https://twitter.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-twitter"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Instagram Profile:</th>
                                                        <td>
                                                            <a href="https://www.instagram.com/explore" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-instagram"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tiktok Profile:</th>
                                                        <td>
                                                            <a href="https://tiktok.com/" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-tiktok"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Youtube Profile:</th>
                                                        <td>
                                                            <a href="https://www.youtube.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-youtube"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Wikipedia Profile:</th>
                                                        <td>
                                                            <a href="https://en.wikipedia.org/w/" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-wikipedia-w"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>IMDB Profile:</th>
                                                        <td>
                                                            <a href="https://www.imdb.com" target="_blank" rel="nofollow">
                                                                <i class="fa-brands fa-imdb"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Official Website:</th>
                                                        <td>
                                                            <a href="https://www.google.com/" target="_blank" rel="nofollow">
                                                                <i class="fa-solid fa-link"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="#" class="viewmore">View more / View fewer</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                            <div class="blog-biography-single-post-relationship pb-2">
                                <h5>Relationship Facts of <span>Lance Lim</span></h5>
                                <ul>
                                    <li>Lance Lim is not having an affair with anyone presently.</li>
                                    <li>His sexual orientation is straight.</li>
                                </ul>
                            </div>
                            <div class="blog-biography-single-post-anniversary py-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="aniversary-button">
                                        <a href="#">Today's Anniversary</a>
                                    </div>
                                    <div class="aniversary-button">
                                        <a href="#">Tomorrow's Anniversary</a>
                                    </div>
                                </div>
                                <div class="filter">
                                    <form method="get" action="#">
                                        <div class="d-flex justify-content-around align-items-center">
                                            <select name="dd">
                                                <option value="">Day</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                                <option>31</option>
                                            </select>
                                            <select name="mm">
                                                <option value="">Month</option>
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                            <select name="yy">
                                                <option value="">Year</option>
                                                <option>1900</option>
                                                <option>1901</option>
                                                <option>1902</option>
                                                <option>1903</option>
                                                <option>1904</option>
                                                <option>1905</option>
                                                <option>1906</option>
                                                <option>1907</option>
                                                <option>1908</option>
                                                <option>1909</option>
                                                <option>1910</option>
                                                <option>1911</option>
                                                <option>1912</option>
                                                <option>1913</option>
                                                <option>1914</option>
                                                <option>1915</option>
                                                <option>1916</option>
                                                <option>1917</option>
                                                <option>1918</option>
                                                <option>1919</option>
                                                <option>1920</option>
                                                <option>1921</option>
                                                <option>1922</option>
                                                <option>1923</option>
                                                <option>1924</option>
                                                <option>1925</option>
                                                <option>1926</option>
                                                <option>1927</option>
                                                <option>1928</option>
                                                <option>1929</option>
                                                <option>1930</option>
                                                <option>1931</option>
                                                <option>1932</option>
                                                <option>1933</option>
                                                <option>1934</option>
                                                <option>1935</option>
                                                <option>1936</option>
                                                <option>1937</option>
                                                <option>1938</option>
                                                <option>1939</option>
                                                <option>1940</option>
                                                <option>1941</option>
                                                <option>1942</option>
                                                <option>1943</option>
                                                <option>1944</option>
                                                <option>1945</option>
                                                <option>1946</option>
                                                <option>1947</option>
                                                <option>1948</option>
                                                <option>1949</option>
                                                <option>1950</option>
                                                <option>1951</option>
                                                <option>1952</option>
                                                <option>1953</option>
                                                <option>1954</option>
                                                <option>1955</option>
                                                <option>1956</option>
                                                <option>1957</option>
                                                <option>1958</option>
                                                <option>1959</option>
                                                <option>1960</option>
                                                <option>1961</option>
                                                <option>1962</option>
                                                <option>1963</option>
                                                <option>1964</option>
                                                <option>1965</option>
                                                <option>1966</option>
                                                <option>1967</option>
                                                <option>1968</option>
                                                <option>1969</option>
                                                <option>1970</option>
                                                <option>1971</option>
                                                <option>1972</option>
                                                <option>1973</option>
                                                <option>1974</option>
                                                <option>1975</option>
                                                <option>1976</option>
                                                <option>1977</option>
                                                <option>1978</option>
                                                <option>1979</option>
                                                <option>1980</option>
                                                <option>1981</option>
                                                <option>1982</option>
                                                <option>1983</option>
                                                <option>1984</option>
                                                <option>1985</option>
                                                <option>1986</option>
                                                <option>1987</option>
                                                <option>1988</option>
                                                <option>1989</option>
                                                <option>1990</option>
                                                <option>1991</option>
                                                <option>1992</option>
                                                <option>1993</option>
                                                <option>1994</option>
                                                <option>1995</option>
                                                <option>1996</option>
                                                <option>1997</option>
                                                <option>1998</option>
                                                <option>1999</option>
                                                <option>2000</option>
                                                <option>2001</option>
                                                <option>2002</option>
                                                <option>2003</option>
                                                <option>2004</option>
                                                <option>2005</option>
                                                <option>2006</option>
                                                <option>2007</option>
                                                <option>2008</option>
                                                <option>2009</option>
                                                <option>2010</option>
                                                <option>2011</option>
                                                <option>2012</option>
                                                <option>2013</option>
                                                <option>2014</option>
                                                <option>2015</option>
                                                <option>2016</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                            </select>
                                            <input type="submit" class="btn btn-danger btn-xs filter-search" id="searchsubmit" value="Who married when?" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="blog-biography-single-post-birthday py-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="birthday-button">
                                        <a href="#">Today's Birthday</a>
                                    </div>
                                    <div class="birthday-button">
                                        <a href="#">Tomorrow's Birthday</a>
                                    </div>
                                </div>
                                <div class="filter">
                                    <form method="get" action="#">
                                        <div class="d-flex justify-content-around align-items-center">
                                            <select name="dd">
                                                <option value="">Day</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                                <option>31</option>
                                            </select>
                                            <select name="mm">
                                                <option value="">Month</option>
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                            <select name="yy">
                                                <option value="">Year</option>
                                                <option>1900</option>
                                                <option>1901</option>
                                                <option>1902</option>
                                                <option>1903</option>
                                                <option>1904</option>
                                                <option>1905</option>
                                                <option>1906</option>
                                                <option>1907</option>
                                                <option>1908</option>
                                                <option>1909</option>
                                                <option>1910</option>
                                                <option>1911</option>
                                                <option>1912</option>
                                                <option>1913</option>
                                                <option>1914</option>
                                                <option>1915</option>
                                                <option>1916</option>
                                                <option>1917</option>
                                                <option>1918</option>
                                                <option>1919</option>
                                                <option>1920</option>
                                                <option>1921</option>
                                                <option>1922</option>
                                                <option>1923</option>
                                                <option>1924</option>
                                                <option>1925</option>
                                                <option>1926</option>
                                                <option>1927</option>
                                                <option>1928</option>
                                                <option>1929</option>
                                                <option>1930</option>
                                                <option>1931</option>
                                                <option>1932</option>
                                                <option>1933</option>
                                                <option>1934</option>
                                                <option>1935</option>
                                                <option>1936</option>
                                                <option>1937</option>
                                                <option>1938</option>
                                                <option>1939</option>
                                                <option>1940</option>
                                                <option>1941</option>
                                                <option>1942</option>
                                                <option>1943</option>
                                                <option>1944</option>
                                                <option>1945</option>
                                                <option>1946</option>
                                                <option>1947</option>
                                                <option>1948</option>
                                                <option>1949</option>
                                                <option>1950</option>
                                                <option>1951</option>
                                                <option>1952</option>
                                                <option>1953</option>
                                                <option>1954</option>
                                                <option>1955</option>
                                                <option>1956</option>
                                                <option>1957</option>
                                                <option>1958</option>
                                                <option>1959</option>
                                                <option>1960</option>
                                                <option>1961</option>
                                                <option>1962</option>
                                                <option>1963</option>
                                                <option>1964</option>
                                                <option>1965</option>
                                                <option>1966</option>
                                                <option>1967</option>
                                                <option>1968</option>
                                                <option>1969</option>
                                                <option>1970</option>
                                                <option>1971</option>
                                                <option>1972</option>
                                                <option>1973</option>
                                                <option>1974</option>
                                                <option>1975</option>
                                                <option>1976</option>
                                                <option>1977</option>
                                                <option>1978</option>
                                                <option>1979</option>
                                                <option>1980</option>
                                                <option>1981</option>
                                                <option>1982</option>
                                                <option>1983</option>
                                                <option>1984</option>
                                                <option>1985</option>
                                                <option>1986</option>
                                                <option>1987</option>
                                                <option>1988</option>
                                                <option>1989</option>
                                                <option>1990</option>
                                                <option>1991</option>
                                                <option>1992</option>
                                                <option>1993</option>
                                                <option>1994</option>
                                                <option>1995</option>
                                                <option>1996</option>
                                                <option>1997</option>
                                                <option>1998</option>
                                                <option>1999</option>
                                                <option>2000</option>
                                                <option>2001</option>
                                                <option>2002</option>
                                                <option>2003</option>
                                                <option>2004</option>
                                                <option>2005</option>
                                                <option>2006</option>
                                                <option>2007</option>
                                                <option>2008</option>
                                                <option>2009</option>
                                                <option>2010</option>
                                                <option>2011</option>
                                                <option>2012</option>
                                                <option>2013</option>
                                                <option>2014</option>
                                                <option>2015</option>
                                                <option>2016</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                            </select>
                                            <input type="submit" class="btn btn-danger btn-xs filter-search" id="searchsubmit" value="Who born when?" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="blog-biography-single-post-shorttext py-2 my-2">
                                <h3>More about the relationship</h3>
                                <p>Lance Lim is possibly <strong>single.</strong> He is currently more focused on his career rather than on relationships.</p>
                                <p>Furthermore, he seems to be a private person when it comes to his personal life.</p>
                            </div>

                            <div class="blog-biography-single-post-content py-2 my-2">
                                <div class="blog-biography-tab-header">
                                    <h5>Inside Biography <span id="blog_biography_toggle">[hide]</span> </h5>
                                    <ul class="blog-biography-tab-header-list">
                                        <li><a href="#Who_is_Lance_Lim">Who is Lance Lim?</a></li>
                                        <li><a href="#Lance_Lim_8211_Age_Parents_Siblings_Ethnicity_Education">Lance Lim – Age, Parents, Siblings, Ethnicity, Education</a></li>
                                        <li><a href="#Lance_Lim_8211_Professional_Life_Careers">Lance Lim – Professional Life, Careers</a></li>
                                    </ul>
                                </div>
                                <div class="blog-biography-tab-content">
                                    <article id="Who_is_Lance_Lim" class="blog-biography-tab-content-list">
                                        <h4>Who is Lance Lim?</h4>
                                        <p><strong>Lance Lim</strong> is an American actor who is best known for playing Zack in the musical comedy TV series School of Rock on Nickelodeon, which also stars <a href="#">Breanna Yde</a>,
                                            <a href="#">Jade Pettyjohn</a>,
                                            <a href="#">Ricardo Hurtado</a>, and <a href="#">Tony Cavalero</a></p>
                                        <p>He was cast in <em>Independence Day: Resurgence</em> and has made appearances in episodes of <em>Anger Management and Fresh Off the Boat</em>.</p>
                                    </article>
                                    <article id="Lance_Lim_8211_Age_Parents_Siblings_Ethnicity_Education" class="blog-biography-tab-content-list">
                                        <h4>Lance Lim – Age, Parents, Siblings, Ethnicity, Education</h4>
                                        <p>Lance was <strong>born</strong> on December 16, 2000, in Los Angeles, CA. As of 2022, his <strong>age</strong> is 21 years old. Talking about his <strong>nationality,</strong> he holds an American identity and is
                                            of Korean descent.</p>
                                        <p>He has not revealed much information regarding his <strong>educational</strong> background.</p>
                                    </article>
                                    <article id="Lance_Lim_8211_Professional_Life_Careers" class="blog-biography-tab-content-list">
                                        <h4>Lance Lim – Professional Life, Careers</h4>
                                        <p>Lance participated in South Korea’s MBC Star Audition before his breakthrough role on Growing Up Fisher. His character on this series, Eli Baker’s character Henry Fisher’s closest friend was named Runyan.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-single-post-tags pt-4 pb-2">
                        Tags:
                        <a href="#" rel="tag">beauty</a>
                        <a href="#" rel="tag">carousel</a>
                        <a href="#" rel="tag">hair</a>
                        <a href="#" rel="tag">style</a>
                    </div>
                    <section class="blog-biography-related-post blog-sidebar-cat py-3">
                        <div class="section-header">
                            <h3 class="section-title">Recent Post on <span>Lance Lim</span></h3>
                        </div>
                        <div class="blog-sidebar-cat-list">
                            <article class="blog-sidebar-cat-content d-flex">
                                <div class="blog-sidebar-cat-thumb zoom">
                                    <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                </div>
                                <div class="blog-sidebar-cat-main">
                                    <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                    <div class="blog-sidebar-cat-meta">
                                        <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                        <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="blog-sidebar-cat-content d-flex">
                                <div class="blog-sidebar-cat-thumb zoom">
                                    <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                </div>
                                <div class="blog-sidebar-cat-main">
                                    <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                    <div class="blog-sidebar-cat-meta">
                                        <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                        <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="blog-sidebar-cat-content d-flex">
                                <div class="blog-sidebar-cat-thumb zoom">
                                    <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                </div>
                                <div class="blog-sidebar-cat-main">
                                    <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                    <div class="blog-sidebar-cat-meta">
                                        <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                        <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                    </div>
                                </div>
                            </article>
                            <article class="blog-sidebar-cat-content d-flex">
                                <div class="blog-sidebar-cat-thumb zoom">
                                    <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                </div>
                                <div class="blog-sidebar-cat-main">
                                    <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                    <div class="blog-sidebar-cat-meta">
                                        <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                        <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>
                <div class="co1-12 col-sm-12 col-md-12 col-lg-4">
                    <div id="rightSidebar" class="sidebar-section right-sidebar">
                        <div class="blog-single-post-sidebar sidebar-inner">
                            <section class="blog-sidebar-cat blog-sidebar-cat-1 pb-4">
                                <div class="section-header">
                                    <h3 class="section-title">Entertainment</h3>
                                </div>
                                <div class="blog-sidebar-cat-list">
                                    <article class="blog-sidebar-cat-content d-flex mb-4">
                                        <div class="blog-sidebar-cat-thumb zoom">
                                            <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                        </div>
                                        <div class="blog-sidebar-cat-main">
                                            <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                            <div class="blog-sidebar-cat-meta">
                                                <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                                <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-sidebar-cat-content d-flex mb-4">
                                        <div class="blog-sidebar-cat-thumb zoom">
                                            <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                        </div>
                                        <div class="blog-sidebar-cat-main">
                                            <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                            <div class="blog-sidebar-cat-meta">
                                                <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                                <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-sidebar-cat-content d-flex mb-4">
                                        <div class="blog-sidebar-cat-thumb zoom">
                                            <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                        </div>
                                        <div class="blog-sidebar-cat-main">
                                            <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                            <div class="blog-sidebar-cat-meta">
                                                <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                                <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="blog-sidebar-cat-content d-flex mb-4">
                                        <div class="blog-sidebar-cat-thumb zoom">
                                            <img src="./img/Brooklyn-Beckham.jpg" alt="Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!" class="img-fluid">
                                        </div>
                                        <div class="blog-sidebar-cat-main">
                                            <h4 class="blog-sidebar-cat-title"><a href="">Brooklyn Beckham Talks About His Dream Of Becoming A Young Dad!</a></h4>
                                            <div class="blog-sidebar-cat-meta">
                                                <span class="blog-sidebar-cat-meta-author me-2"><i class="fa-solid fa-user me-1"></i>admin</span>
                                                <span class="blog-sidebar-cat-meta-date"><i class="fa-solid fa-clock me-1"></i>August 15, 2022</span>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </section>
                            <section class="blog-sidebar-biography pb-4">
                                <div class="section-header d-flex justify-content-between align-items-center">
                                    <h3 class="section-title"><a href="#">Biography</a></h3>
                                    <h3 class="section-view-more"><a href="#">View More</a></h3>
                                </div>
                                <div class="blog-sidebar-biography-list">
                                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 py-2">
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="">
                                                        <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            Married
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="">
                                                        <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            Single
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="">
                                                        <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            Married
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="">
                                                        <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            Married
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="">
                                                        <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            Married
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col">
                                            <article class="blog-sidebar-biography-item mb-4">
                                                <div class="blog-item-thumb zoom image is-1by1">
                                                    <a href="">
                                                        <img src="./img/Lou-Diamond-Phillips.jpg" alt="" class="img-fluid">
                                                    </a>
                                                    <div class="ribbon-item">
                                                        <div class="ribbon-item-inner">
                                                            Single
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="blog-item-main text-center text-center">
                                                    <h4 class="blog-item-title py-2"><a href="">Lou Diamond Phillips</a></h4>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-single-recent-biography mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header d-flex justify-content-between align-items-center">
                            <h3 class="section-title"><a href="#">Recent Biography</a></h3>
                        </div>
                    </div>
                </div>
                <div class="loadMoreContent row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 py-2">
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                    <div class="col">
                        <article class="blog-item shadow mb-3">
                            <div class="blog-item-thumb zoom image is-1by1">
                                <a href="">
                                    <img src="./img/Conrad-Hughes-Hilton.jpg" alt="Conrad Hughes Hilton" class="img-fluid">
                                </a>
                                <div class="ribbon-item">
                                    <div class="ribbon-item-inner">
                                        Married
                                    </div>
                                </div>
                            </div>
                            <div class="blog-item-main text-center text-center p-2">
                                <h4 class="blog-item-title"><a href="">Conrad Hughes Hilton</a></h4>
                                <p class="blog-item-age mb-0">( 28 years old )</p>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <!-- Load More Button -->
                        <a name="loadMoreBtn" id="loadMoreBtn" class="d-inline-block load-more-btn">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
</body>

@endsection