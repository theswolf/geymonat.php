'use strict';
(function(context) {

    context.widgets = context.widgets || [];

    var ButtonCollapse = React.createClass({

        componentDidMount : function() {
            //console.log(this.refs.buttonCollapse);
            $(this.refs.buttonCollapse).sideNav();
        },

        render: function() {
            return (
                <a href="#"  ref="buttonCollapse"
                   data-activates="nav-mobile" className="button-collapse"><i className="material-icons">menu</i></a>
            );
        }
    });

    var ListItem = React.createClass({
        render: function() {
            return (
                <li><a href={this.props.item.ref}>{this.props.item.desc}</a></li>
            );
        }
    });

    var Nav = React.createClass({

    /*{this.props.results.map(function(result) {
        return <ListItemWrapper key={result.id} data={result}/>;
    })}*/

        render: function() {
            console.log(this.props);
            return (
                <nav className="white" role="navigation">
                <div className="nav-wrapper container">
                    <a id="logo-container" href="#" className="brand-logo">Logo</a>
                    <ul className="right hide-on-med-and-down">
                        {this.props.links.map(function(item) {
                            return <ListItem item={item}/>;
                        })}
                    </ul>

                    <ul id="nav-mobile" className="side-nav">
                        {this.props.links.map(function(item) {
                            return <ListItem item={item}/>;
                        })}
                    </ul>
                    <ButtonCollapse/>
                </div>
                </nav>
            );
        }
    });

    context.widgets['Nav'] = Nav;
    console.log("Registered Nav");

    var Parallax = React.createClass({
        componentDidMount: function() {
            $(this.refs.parallax).parallax();
        },
        getInitialState: function() {
            return {link: './image?ver=' + this.props.time};
        },
        render: function(){
            return (
                <div ref="parallax" className="parallax"><img src={this.state.link} alt="Unsplashed background img 1" /></div>
            );
        }
    });

    var IndexBanner = React.createClass({

        getTime: function() {
            return (new Date()).getTime();
        },

        render: function() {
            return (
                <div id="index-banner" className="parallax-container">
                    <div className="section no-pad-bot">
                        <div className="container">
                            <br/><br/>
                            <h1 className="header center teal-text text-lighten-2">Parallax Template</h1>
                            <div className="row center">
                                <h5 className="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                            </div>
                            <div className="row center">
                                <a href="http://materializecss.com/getting-started.html" id="download-button" className="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
                            </div>
                            <br/><br/>
                            </div>
                        </div>
                    <Parallax time={this.getTime()}/>
                </div>
            );
        }
    });

    context.widgets['IndexBanner'] = IndexBanner;
    console.log("Registered IndexBanner");




})(window)