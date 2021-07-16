<?php

namespace InnovationsPortalen\Modularity;

class Event
{
    private $dbTable;

    public function __construct()
    {
        //Setup local wpdb instance
        global $wpdb;
        $this->db = $wpdb;
        $this->dbTable = $wpdb->prefix . "integrate_occasions";

        //Run functions if table exists
        if ($this->db->get_var("SHOW TABLES LIKE '" . $this->dbTable . "'") !== null) {
            add_action('pre_get_posts', array($this, 'filterEvents'), 200);
        }
    }

    /**
     * Filter events
     * @param  object $query object WP Query
     */
    public function filterEvents($query)
    {
        if ((isset($query->query['post_type']) && $query->query['post_type'] !== 'event')
            || is_post_type_archive('event')
            || $query->is_post_type_archive) {
            return $query;
        }

        add_filter('posts_fields', array($this, 'eventFilterSelect'));
        add_filter('posts_join', array($this, 'eventFilterJoin'));
        add_filter('posts_groupby', array($this, 'eventFilterGroupBy'));
        add_filter('posts_orderby', array($this, 'eventFilterOrderBy'));

        return $query;
    }

    /**
     * Select tables
     * @param  string $select Original query
     * @return string         Modified query
     */
    public function eventFilterSelect($select)
    {
        return $select . ",{$this->dbTable}.start_date,{$this->dbTable}.end_date,{$this->dbTable}.door_time,{$this->dbTable}.status,{$this->dbTable}.exception_information,{$this->dbTable}.content_mode,{$this->dbTable}.content,{$this->dbTable}.location_mode,{$this->dbTable}.location ";
    }

    /**
     * Join taxonomies and postmeta to sql statement
     * @param  string $join current join sql statement
     * @return string       updated statement
     */
    public function eventFilterJoin($join)
    {
        return $join . " LEFT JOIN {$this->dbTable} ON ({$this->db->posts}.ID = {$this->dbTable}.event_id) ";
    }

    /**
     * Add group by statement
     * @param  string $groupby current group by statement
     * @return string          updated statement
     */
    public function eventFilterGroupBy($groupby)
    {
        global $wpdb;
        $groupby = "{$wpdb->posts}.ID ,{$this->dbTable}.start_date, {$this->dbTable}.end_date";

        return $groupby;
    }

    /**
     * Add order by statement
     * @param  string $groupby current group by statement
     * @return string          updated statement
     */
    public function eventFilterOrderBy($orderby)
    {
        return "{$this->dbTable}.start_date ASC";
    }
}
