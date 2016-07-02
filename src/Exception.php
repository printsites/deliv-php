<?php
namespace Deliv;
/**
 * Exception
 *
 * An exception object represents the event or defect that caused a delivery
 * or fetch to be canceled or returned.
 *
 * The list of exception codes and their descriptions:
 * <ul>
 * <li>1 Duplicate Order</li>
 * <li>2 Wrong order number</li>
 * <li>3 Lost</li>
 * <li>4 Cancellation of order/li>
 * <li>5 Change to order</li>
 * <li>6 Damage</li>
 * <li>7 Other</li>
 * <li>8 Business Closed</li>
 * <li>9 Delay at pickup</li>
 * <li>10  Wrong order number</li>
 * <li>11	Over/underage of packages</li>
 * <li>12	Damage</li>
 * <li>13	Cancellation of order</li>
 * <li>14	Lost</li>
 * <li>15	Change to order</li>
 * <li>16	Other</li>
 * <li>17	Consolidation center is full</li>
 * <li>18	Damage</li>
 * <li>19	Cancellation of order</li>
 * <li>20	Lost</li>
 * <li>21	Change to order</li>
 * <li>22	Other</li>
 * <li>23	Customer did not pickup</li>
 * <li>24	Customer changed in-mall pickup to delivery</li>
 * <li>25	Customer changed delivery to in-mall pickup</li>
 * <li>26	Customer refused package(s)</li>
 * <li>27	Damage</li>
 * <li>28	Cancellation of order</li>
 * <li>29	Lost</li>
 * <li>30	Change to order</li>
 * <li>31	Other</li>
 * <li>32	Consolidation center is full</li>
 * <li>33	Delay at pickup</li>
 * <li>34	Not properly packaged or labeled</li>
 * <li>35	Over/underage of packages</li>
 * <li>36	Damage</li>
 * <li>37	Cancellation of order</li>
 * <li>38	Lost</li>
 * <li>39	Change to order</li>
 * <li>40	Other</li>
 * <li>41	Business closed</li>
 * <li>42	Order delayed</li>
 * <li>44	Packaging problem</li>
 * <li>45	Unexpected count</li>
 * <li>46	Damaged</li>
 * <li>47	Cancelled</li>
 * <li>48	Lost</li>
 * <li>49	Change to order</li>
 * <li>50	Other</li>
 * <li>51	Driver no-show</li>
 * <li>52	Driver delayed by traffic</li>
 * <li>53	Driver delay (other)</li>
 * <li>54	Vehicle problems</li>
 * <li>55	Cell phone died</li>
 * <li>56	Weather / force majeure</li>
 * <li>57	Other</li>
 * <li>58	Address inaccessible</li>
 * <li>59	Address incorrect</li>
 * <li>60	Wrong or no recipient</li>
 * <li>61	Delivery refused</li>
 * <li>62	Damaged</li>
 * <li>63	Cancelled</li>
 * <li>65	Change to order</li>
 * <li>66	Other</li>
 * <li>67	Business closed</li>
 * <li>68	Exceeds vehicle capacity</li>
 * <li>69	Too large or heavy</li>
 * <li>70	Destination address changed</li>
 * <li>71	Delivered early</li>
 * <li>72	Recipient too young</li>
 * <li>73	Address inaccessible</li>
 * <li>74	Address incorrect</li>
 * <li>75	Signature unavailable</li>
 * <li>76	Signature unavailable</li>
 * </ul>
 *
 * @author Joseph Jozwik <jjozwik@printsites.com>
 * @since 1.0
 * @package deliv-php-sdk
 * @version 1.0
 * @copyright Copyright (c) 2016 PrintSites
 * @license https://opensource.org/licenses/MIT MIT
 *
 */
class Exception {
  /**
   * @var int $code An integer representing the unique exception or defec
   */
  public $code;
  /**
   * @var string $Description A terse human readbale description of the exception or defect
   */
  public $Description;
}